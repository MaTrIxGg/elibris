<?php
namespace modelo\dao;
use modelo\generico\GenericoDAO;
class FotoDAO extends GenericoDAO {
    public function __construct(&$cnn) {
        parent::__construct($cnn, 'foto');
    }
}
