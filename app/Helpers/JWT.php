<?php 

    /**
     * JWT
     * 
     * Helper class for Lcobucci Json Web Token.
     */

    namespace App\Helpers;

    use Lcobucci\JWT\Builder;
    use Lcobucci\JWT\Signer\Hmac\Sha256;
    use Lcobucci\JWT\Parser;
    use Lcobucci\JWT\Token;
    use Lcobucci\JWT\ValidationData;

    class JWT 
    {
        /**
         * @var string $secretKey
         */
        private $secretKey;
        
        /**
         * @var string $iss
         */
        private $iss;
        
        /**
         * @var int $nbf
         */
        private $nbf;
        
        /**
         * @var int $exp
         */
        private $exp;

        /**
         * Set secret key, issuer, not before
         * and expiration.
         *
         * @param string $secretKey
         * @param string $iss
         * @param int $nbf
         * @param int $exp
         */
        public function __construct(string $secretKey, string $iss = '', int $nbf = 0, int $exp = 3600)
        {
            $this->secretKey = $secretKey;
            $this->iss       = $iss;
            $this->nbf       = $nbf;
            $this->exp       = $exp;
        }

        /**
         * Encode token.
         *
         * @param array $data
         * @param mixed $id
         * @param string $iss
         * @param integer $nbf
         * @param integer $exp
         * @return string
         */
        public function encode(
            string $claim,
            array $data = [], 
            $id = null, 
            string $iss = null, 
            int $nbf = null, 
            int $exp = null
        ): string
        {
            $signer  = new Sha256;
            $builder = new Builder;
            
            if ($id) {
                $builder->setId($id, true);
            }
             
            $builder->setIssuedAt(time())
                ->setIssuer(($iss) ? $iss : $this->iss)
                ->setNotBefore(time() + (($nbf) ? $nbf : $this->nbf))
                ->setExpiration(time() + (($exp) ? $exp : $this->exp))
                ->set($claim, $data)
                ->sign($signer, $this->secretKey);
            
            return $builder->getToken();
        }

        /**
         * Decode token.
         *
         * @param string $token
         * @return Token
         */
        public function decode(string $token): Token
        {
            return (new Parser())->parse((string) $token);
        }

        /**
         * Verify signature token.
         *
         * @param string $token
         * @return bool
         */
        public function verify(string $token): bool
        {
            $token = $this->decode($token);
            $signer = new Sha256;
            return $token->verify($signer, $this->secretKey);
        }

        /**
         * Validate token.
         *
         * @param string $token
         * @param string $iss
         * @param mixed $id
         * @return bool
         */
        public function validate(string $token, string $iss = null, $id = null): bool
        {
            $token = $this->decode($token);
            $data = new ValidationData;
            return $token->validate($data);
        }
    }

