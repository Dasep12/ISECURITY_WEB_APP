<?php

class Roles_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function access_app($npk, $app)
    {
        $q = $this->db->query("
            SELECT COUNT(1) total_app
                FROM admisec_roles_users aru
                INNER JOIN admisec_modules_roles amr ON amr.roles_id=aru.roles_id
                INNER JOIN admisec_modules amo ON amo.id=amr.modules_id 
                INNER JOIN admisec_apps aap ON aap.id=amo.apps_id
            WHERE aru.npk ='$npk' AND aap.code='$app'
        ");

        // $q = $this->db->query("
        //         SELECT COUNT(1) total_app
        //             FROM admisec_roles_users aru
        //             INNER JOIN admisec_modules_roles amr on amr.roles_id=aru.roles_id 
        //             INNER JOIN admisec_apps aa ON aa.code='$app'
        //         WHERE aru.npk ='$npk'
        //     ");

        return $q;
    }

    public function access_modul($npk, $module)
    {
        $q = $this->db->query("
                SELECT aru.npk, amr.modules_id, amr.roles_id, amr.crt, amr.red, amr.edt, amr.dlt, amr.apr, amr.rjc
                    FROM admisec_roles_users aru
                    INNER JOIN admisec_modules_roles amr ON amr.roles_id=aru.roles_id
                 WHERE aru.npk='$npk' AND amr.modules_id=(select id from admisec_modules where code='$module')
            ");

        return $q;
    }

    public function access_roles($npk, $role_code)
    {
        $q = $this->db->query("
                SELECT aru.id, aro.level, amr.crt, amr.red, amr.edt, amr.dlt  
                    FROM isecurity.dbo.admisec_roles_users aru 
                    INNER JOIN isecurity.dbo.admisec_modules_roles amr on amr.roles_id=aru.roles_id
                    INNER JOIN isecurity.dbo.admisec_modules amd ON amd.id=amr.modules_id
                    INNER JOIN isecurity.dbo.admisecsgp_mstroleusr aro ON aro.role_id=aru.roles_id
                    INNER JOIN isecurity.dbo.admisecsgp_mstusr amu ON amu.npk=aru.npk
                WHERE aru.npk='$npk' AND aro.level='$role_code'
            ");

        return $q;
    }
}

?>
 