<?php

namespace modelo\generico;

interface IENTIDAD {
    function getCampos();
    function convertir(array $info, $alias = true);
}
