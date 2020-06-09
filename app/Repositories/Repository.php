<?php


namespace App\Repositories;


abstract class Repository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    /**
     * RootRepositoryImpl constructor.
     */
    public function __construct () {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel ();

    /**
     * Set model
     */
    public function setModel () {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll () {

        return $this->_model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function findById ($id) {
        $result = $this->_model->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create (array $attributes) {

        return $this->_model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update ($id, array $attributes) {
        $result = $this->_model->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete ($id) {
        $result = $this->_model->find($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
    }

    /**
     * InActive
     * @param $id
     * @return bool
     */
    public function inActive($id) {
        $rs = $this->_model->find($id);
        if ($rs) {
            $rs->update(["active" => false]);
            return true;
        }
        return false;
    }
}
