<?php

 class widgetUsersPromo extends cmsWidget {

    public function run() {
    
        if(isset($_SESSION['user']['is_admin'])) {
            $users = $_SESSION['user']['is_admin'];
        }else {
            $users = 0;
        }
        $model = cmsCore::getModel('users');
        $model_con_types = $model->filterEqual('name', 'promo')->getItem('con_promo_fields');           
        $model_con_types = $model_con_types['values'];
        
        return [
            'users'=> $users,
            'con_types' => $model_con_types,
            
        ];
    }

}
?>