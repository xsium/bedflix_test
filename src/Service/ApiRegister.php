<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Service\Utils;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ApiRegister
{
    /** Fonction pour tester l'authentification
     * @param UserPasswordHasherInterface $hash
     * @param UserRepository $repo
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function authentification(UserPasswordHasherInterface $hash, UserRepository $repo, string $email, string $password)
    {
        // Nettoyage du password
        $password = Utils::cleanInputStatic($password);
        // Récupération du compte
        $recup = $repo->findOneBy(['email' => Utils::cleanInputStatic($email)]);
        // Test si le compte existe
        if ($recup) {
            // Test si le password est valide
            if (!$hash->isPasswordValid($recup, $password)) {
                return false;
            }
            // Test sinon si le password est incorrect
            else {
                return true;
            }
        }
        // Test sinon le compte n'existe pas
        else {
            return false;
        }
    }

    /** Fonction pour générer le token JWT
     * @param string $mail
     * @param string $secretKey
     * @param UserRepository $repo
     * @return string
     */
    public function genToken(string $mail, string $secretKey, UserRepository $repo)
    {
        //construction du JWT
        require_once('../vendor/autoload.php');
        //Variables pour le token
        $issuedAt   = new \DateTimeImmutable();
        $expire     = $issuedAt->modify('+60 minutes')->getTimestamp();
        $serverName = "your.domain.name";
        $username   = $repo->findOneBy(['email' => $mail])->getNom();
        //Contenu du token
        $data = [
            'iat'  => $issuedAt->getTimestamp(),         // Timestamp génération du token
            'iss'  => $serverName,                       // Serveur
            'nbf'  => $issuedAt->getTimestamp(),         // Timestamp empécher date antérieure
            'exp'  => $expire,                           // Timestamp expiration du token
            'userName' => $username,                     // Nom utilisateur
        ];
        //retourne le JWT token encode
        $token = JWT::encode(
            $data,
            $secretKey,
            'HS512'
        );
        return $token;
    }

    /** Fonction pour véfifier si le token JWT est valide
     * @param string $jwt
     * @param string $secretKey
     * @return bool|string
     */
    public function verifyToken(string $jwt, string $secretKey)
    {
        require_once('../vendor/autoload.php');
        try {
            //Décodage du token
            $token = JWT::decode($jwt, new Key($secretKey, 'HS512'));
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
