<?php
function getQuery($radio)
{
    switch ($radio) {
        case 'all':
            return "SELECT id, concat(last_name, ' ',first_name, ' ', middle_name) AS 'ФИО', data_of_birth, created_at, update_at 
                        FROM testdb_user";
        case 'trial':
            return "SELECT  id,  
                        concat(last_name, ' ',first_name, ' ', middle_name) AS 'ФИО', 
                        data_of_birth, 
                        created_at,
                        update_at  
                        FROM testdb_user
                        WHERE    created_at >=  ( CURRENT_DATE - INTERVAL 13 MONTH )
                        ORDER BY  last_name
                        ";
        case 'fired':
            return "SELECT user.id, concat(user.last_name, ' ', user.first_name, ' ', user.middle_name) AS 'ФИО', dismiss.created_at AS 'Дата увольнения' , reason.description 
                        FROM testdb_user AS user
                        JOIN testdb_user_dismission AS dismiss ON user.id = dismiss.user_id
                        JOIN testdb_dismission_reason AS reason ON dismiss.reason_id = reason.id";
        case 'chief':
            return     "
                        SELECT
                        user.id ,
                        concat(user.last_name, ' ', user.first_name, ' ', user.middle_name) AS 'ФИО',
                        department.description AS  'Описание', 
                        position.created_at AS 'Дата приема на работу',
                        concat(leader.last_name, ' ', leader.first_name, ' ', leader.middle_name) AS 'ФИО начальника'
                        
						FROM testdb_user_position AS position
                        JOIN (SELECT position.department_id,  MAX(position.user_id) AS last_user
                                    FROM testdb_user_position AS position
                                    GROUP BY  position.department_id
                            ) 
                            AS last ON position.user_id = last.last_user
                        JOIN testdb_user as user ON user.id = position.user_id
                        JOIN testdb_department AS department ON department.id = last.department_id
                        JOIN testdb_user AS leader ON department.leader_id = leader.id"
                ;
    }

}