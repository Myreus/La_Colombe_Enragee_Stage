<?php
require_once 'connexionBDD.php';
require_once 'fonctions.php';

$id_activity = isset($_POST['activity_id']) ? (int)$_POST['activity_id'] : 0;
$activity_name = trim($_POST['activity_name'] ?? '');
$slug = slugify($activity_name);
$activity_year = $_POST['activity_year'] ?? null;
$status = $_POST['status'] ?? null;
$subtitle = $_POST['subtitle'] ?? null;
$summary = $_POST['summary'] ?? null;
$description = trim($_POST['description'] ?? '');
$credits1 = trim($_POST['credits1'] ?? '');
$credits2 = trim($_POST['credits2'] ?? '');
$video_url = $_POST['video_url'] ?? null;
$category_id = isset($_POST['category_id']) ? (int)$_POST['category_id'] : 0;
$old_img = $_POST['old_img'] ?? null;

// Gestion de l'image
$activity_img = $old_img;
if (isset($_FILES['activity_img']) && $_FILES['activity_img']['error'] === UPLOAD_ERR_OK) {
    $activity_img = uploadImage($_FILES['activity_img'], $old_img);
} elseif (!$id_activity && empty($activity_img)) {
    die("L'image est obligatoire pour une nouvelle activité.");
}

try {
    if ($id_activity > 0) {
        // Mise à jour
        $sql = "UPDATE activity SET 
                    activity_name = :name,
                    slug = :slug,
                    activity_year = :year,
                    status = :status,
                    subtitle = :subtitle,
                    summary = :summary,
                    description = :desc,
                    credits1 = :credits1,
                    credits2 = :credits2,
                    video_url = :video,
                    activity_img = :img,
                    id_category = :cat
                WHERE activity_id = :id";
        $req = $pdo->prepare($sql);
        $req->execute([
            ':name' => $activity_name,
            ':slug' => $slug,
            ':year' => $activity_year,
            ':status' => $status,
            ':subtitle' => $subtitle,
            ':summary' => $summary,
            ':desc' => $description,
            ':credits1' => $credits1,
            ':credits2' => $credits2,
            ':video' => $video_url,
            ':img' => $activity_img,
            ':cat' => $category_id,
            ':id' => $id_activity
        ]);
        $message = "Activité mise à jour.";
    } else {
        // Insertion
        $sql = "INSERT INTO activity (
                    activity_name, slug, activity_year, status, subtitle, summary,
                    description, credits1, credits2, video_url, activity_img, id_category
                ) VALUES (
                    :name, :slug, :year, :status, :subtitle, :summary,
                    :desc, :credits1, :credits2, :video, :img, :cat
                )";
        $req = $pdo->prepare($sql);
        $req->execute([
            ':name' => $activity_name,
            ':slug' => $slug,
            ':year' => $activity_year,
            ':status' => $status,
            ':subtitle' => $subtitle,
            ':summary' => $summary,
            ':desc' => $description,
            ':credits1' => $credits1,
            ':credits2' => $credits2,
            ':video' => $video_url,
            ':img' => $activity_img,
            ':cat' => $category_id
        ]);
        $message = "Nouvelle activité ajoutée.";
    }
    
    header("Location: admin.php?success=" . urlencode($message));
    exit;
    
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>