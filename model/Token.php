<?php
namespace model;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Parser;
class Token{


private $issuer;
private $audience;

public function __construct(){
  $this->issuer='weihuagu.com.zhiyu.server';
  $this->audience='weihuagu.com.zhiyu.client';
}

public function createToken($uid,$expirationtime){
$token = (new Builder())->setIssuer($this->issuer) // Configures the issuer (iss claim)
                        ->setAudience($this->audience) // Configures the audience (aud claim)
                        ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
                        ->setNotBefore(time() + $expirationtime) // Configures the time that the token can be used (nbf claim)
                        ->setExpiration(time() + $expirationtime) // Configures the expiration time of the token (exp claim)
                        ->set('uid', $uid) // Configures a new claim, called "uid"
                        ->getToken(); // Retrieves the generated token

return (string)$token;
}

public function validatingToken($token){
$token = (new Parser())->parse((string) $token); // Parses from a string
$data = new ValidationData(); // It will use the current time to validate (iat, nbf and exp)
$data->setIssuer($this->issuer);
$data->setAudience($this->audience);
$data->setCurrentTime(time()); // changing the validation time to future
return $token->validate($data); // false, because we created a token that cannot be used before of `time() + 60`

}

public function getUserid($token){
if(!$this->validatingToken($token)){
$token = (new Parser())->parse((string) $token); // Parses from a string
return $token->getClaim('uid');

}
else 
return null;
}

public function getTokenClaims($token){
$token = (new Parser())->parse((string) $token); // Parses from a string
return $token->getClaims();



}















}
