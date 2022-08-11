<?php

namespace Walidbtz7\IntraApi;

use Walidbtz7\IntraApi\Api\OAuthWrapper;

class IntraOAuth extends OAuthWrapper
{
	/**
    * @var string[]
    */
	protected $authUrl = '/oauth/authorize';

	/**
    * @var string[]
    */
	protected $refreshTokenUrl = '/oauth/token';

	/**
    * @var string[]
    */
	protected $tokenUrl = '/oauth/token';

	/**
    * @var string[]
    */
	protected $userUrl = '/v2/me';

	/**
    * @var string[]
    */
	protected $redirectUrl = '/api/v2/oauth/intra/callback';

	/**
    * @var string[]
    */
    protected $scopes = [
		'public'
	];

    /**
    * @var string
    */
    protected $scopeSeparator = ' ';

	/**
	 * Map the user's data to a object
	 *
	 * @param   array  $user
	 * @return  $user
	 */
	public function mapUserToObject(array $user)
	{
		return $this->map([
            'id' => $user['id'],
			'realname' => $user['first_name'] . ' ' . $user['last_name'],
            'firstname' => $user['usual_first_name'] ?? $user['first_name'],
            'lastname' => $user['last_name'],
            'email' => $user['email'],
            'courses' => $user['cursus_users'],
            'projects' => $user['projects_users'],
            'expertises' => $user['expertises_users'],
            'avatar' => $user['image_url'],
        ]);
	}
}