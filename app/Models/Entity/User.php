<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Models\Entity;

use Swoft\Db\Bean\Annotation\Id;
use Swoft\Db\Bean\Annotation\Required;
use Swoft\Db\Bean\Annotation\Table;
use Swoft\Db\Bean\Annotation\Column;
use Swoft\Db\Bean\Annotation\Entity;
use Swoft\Db\Model;
use Swoft\Db\Types;

/**
 * 用户实体
 *
 * @Entity()
 * @Table(name="user")
 * @uses      User
 */
class User extends Model
{
    /**
     * 主键ID
     *
     * @Id()
     * @Column(name="id", type=Types::INT)
     * @var null|int
     */
    private $id;

    /**
     * 电子邮件
     *
     * @Column(name="email", type=Types::STRING, length=64)
     * @var null|string
     */
    private $email;

    /**
     * 用户密码
     *
     * @Column(name="password", type=Types::STRING, length=128)
     * @var null|string
     */
    private $password;

    /**
     * 用户名称
     *
     * @Column(name="user_name", type=Types::STRING, length=256)
     * @var int
     */
    private $userName;

    /**
     * 用户性别
     *
     * @Column(name="sex", type=Types::INT)
     * @var int
     */
    private $sex;


    /**
     * 创建时间
     *
     * @Column(name="create_at")
     * @var int
     */
    private $createTime;

    /**
     * 更新时间
     *
     * @Column(name="update_at")
     * @var string
     */
    private $updateTime;

    /**
     * 非数据库字段，未定义映射关系
     *
     * @var mixed
     */
    private $otherProperty;

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    /**
     * @return string|null
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string|null $user_name
     */
    public function setUserName($user_name)
    {
        $this->userName = $user_name;
    }

    /**
     * @return int|null
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     */
    public function setSex($sex = 1)
    {
        $this->sex = $sex;
    }

    /**
     * @return string|null
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param string|null $create_time
     */
    public function setCreateTime($create_time)
    {
        $this->createTime = $create_time;
    }

    /**
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * @param string|null $update_time
     */
    public function setUpdateTime($update_time)
    {
        $this->updateTime = $update_time;
    }

    /**
     * @return mixed
     */
    public function getOtherProperty()
    {
        return $this->otherProperty;
    }

    /**
     * @param mixed $otherProperty
     */
    public function setOtherProperty($otherProperty)
    {
        $this->otherProperty = $otherProperty;
    }
}
