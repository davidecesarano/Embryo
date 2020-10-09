<?php 

    /**
     * User
     */

    namespace App\Models;

    use Embryo\Model;

    class User extends Model
    {
        /**
         * Example method.
         */
        public function all()
        {
            return $this->pdo->table('user')->get();
        }
    }