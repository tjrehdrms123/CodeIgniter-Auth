<?php
    //vaildation 에러를 view에 표시하는 커스텀 헬퍼 함수
    function display_error($validation, $field)
    {
        if($validation->hasError($field)){
            return $validation->getError($field);
        } else {
            return false;
        }
    }
?>