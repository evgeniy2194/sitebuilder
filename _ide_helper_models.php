<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Domain
 *
 * @property integer $id
 * @property string $name
 * @property integer $domaingroup_id
 * @property integer $keywordgroup_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Domaingroup $domaingroup
 * @property-read Keywordgroup $keywordgroup
 * @property-read \Illuminate\Database\Eloquent\Collection|Page[] $pages
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereDomaingroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereKeywordgroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereUpdatedAt($value)
 * @property integer $domaintemplate_id
 * @property-read Domaintemplate $domaintemplate
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereDomaintemplateId($value)
 */
	class Domain {}
}

namespace App{
/**
 * App\Domaingroup
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Domain[] $domains
 * @method static \Illuminate\Database\Query\Builder|\App\Domaingroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domaingroup whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domaingroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domaingroup whereUpdatedAt($value)
 */
	class Domaingroup {}
}

namespace App{
/**
 * App\Domaintemplate
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Domain[] $domains
 * @method static \Illuminate\Database\Query\Builder|\App\Domaintemplate whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domaintemplate whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domaintemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domaintemplate whereUpdatedAt($value)
 */
	class Domaintemplate {}
}

namespace App{
/**
 * App\Keyword
 *
 * @property integer $id
 * @property string $name
 * @property integer $keywordgroup_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Keywordgroup $keywordgroup
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereKeywordgroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|Page[] $pages
 */
	class Keyword {}
}

namespace App{
/**
 * App\Keywordgroup
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Keyword[] $keywords
 * @property-read \Illuminate\Database\Eloquent\Collection|Domain[] $domains
 * @method static \Illuminate\Database\Query\Builder|\App\Keywordgroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keywordgroup whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keywordgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keywordgroup whereUpdatedAt($value)
 */
	class Keywordgroup {}
}

namespace App{
/**
 * App\Page
 *
 * @property integer $id
 * @property string $name
 * @property mixed $body
 * @property integer $keyword_id
 * @property integer $domain_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Domain $domain
 * @property-read Keyword $keyword
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereKeywordId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereDomainId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereUpdatedAt($value)
 * @property string $slug
 * @property boolean $content_requested
 * @property boolean $content_delivered
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereContentRequested($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereContentDelivered($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page active()
 */
	class Page {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 */
	class User {}
}

