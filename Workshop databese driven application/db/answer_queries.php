<?php
function answer(PDO $database, int $questionId, int $userId, string $body)
{
    $query = " INSERT INTO answers(
                  body, author_id, question_id  
 )values 
         ( ?,?,?);
    
    ";

    $stmt = $database->prepare($query);
    $stmt->execute($body, $userId, $questionId);
}

function getAnswersByQuestionId(PDO $database, int $questionId): array
{
    $query = "
    Select 
    a.id,
    a.body,
    a.created_on,
    u.username AS 'author_name'
    FROM
     answers AS a 
    INNER join 
         user u on a.author_id = u.id
    WHERE a.question_id = ?
    ORDER BY a.created_on desc , a.id asc
    ";

    $stmt = $database->prepare($query);
    $stmt->execute($questionId);

    return  $stmt->fetchAll(PDO::FETCH_ASSOC);
}