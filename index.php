<?php
$members = [
    1 => [
        'name' => 'Muhamad Febrian',
        'student_id' => '001202505021',
        'major' => 'Informatics',
        'batch' => '2025',
        'image' => 'images/febri.jpg',
        'background' => 'Halo, saya Muhamad Febrian. Saya tertarik mempelajari pengembangan web dan terus berlatih membangun tampilan yang rapi dan mudah digunakan. Di project ini saya ikut berkontribusi dalam pembuatan website kelompok dan pengembangan ide kontennya.',
    ],
    2 => [
        'name' => 'Fajar Firman Firdaus',
        'student_id' => '001202505029',
        'major' => 'Informatics',
        'batch' => '2025',
        'image' => 'images/fajar.jpg',
        'background' => 'Halo, saya Fajar Firman Firdaus. Saya sedang belajar Web Application Development dan ingin memahami alur pengembangan dari frontend sampai backend. Project ini saya gunakan untuk melatih struktur data, tampilan, dan logika dasar PHP.',
    ],
    3 => [
        'name' => 'Fauzan Ibnu Zaen Nasution',
        'student_id' => '001202505006',
        'major' => 'Informatics',
        'batch' => '2025',
        'image' => 'images/fauzan.jpg',
        'background' => 'Hello Guys! My name is Fauzan Ibnu Zaen Nasution, and you can call me Fauzan. I focus on Web Application Development. In this group website project, I am responsible for UI/UX design and frontend development. When I am not coding, I usually spend my time working or playing games. We know that the results will not betray the effort.',
    ],
];

function getMemberById(array $members, int $id): ?array
{
    return $members[$id] ?? null;
}

$selectedId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$selectedMember = $selectedId ? getMemberById($members, $selectedId) : null;
$isDetailPage = $selectedMember !== null;
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isDetailPage ? htmlspecialchars($selectedMember['name']) : 'Group Website'; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="container">
        <?php if ($isDetailPage): ?>
            <div class="profile-detail-card">
                <p class="page-label">Detail Member</p>
                <h1 class="profile-name"><?= htmlspecialchars($selectedMember['name']); ?></h1>

                <div class="profile-flex">
                    <div class="profile-img-large">
                        <img src="<?= htmlspecialchars($selectedMember['image']); ?>" alt="<?= htmlspecialchars($selectedMember['name']); ?>">
                    </div>

                    <div class="profile-info">
                        <p><strong>Student ID:</strong> <?= htmlspecialchars($selectedMember['student_id']); ?></p>
                        <p><strong>Major:</strong> <?= htmlspecialchars($selectedMember['major']); ?></p>
                        <p><strong>Batch:</strong> <?= htmlspecialchars($selectedMember['batch']); ?></p>

                        <section class="background-section">
                            <h4>Describe your background:</h4>
                            <p><?= htmlspecialchars($selectedMember['background']); ?></p>
                        </section>
                    </div>
                </div>

                <a href="index.php" class="btn-back">&larr; Kembali</a>
            </div>
        <?php else: ?>
            <header>
                <!-- <p class="page-label">PHP Native Version</p> -->
                <h1>Group Website</h1>
                <p class="subtitle">Our Member</p>
            </header>

            <div class="member-grid">
                <?php foreach ($members as $id => $member): ?>
                    <article class="card">
                        <div class="profile-img">
                            <img src="<?= htmlspecialchars($member['image']); ?>" alt="<?= htmlspecialchars($member['name']); ?>">
                        </div>

                        <h3><?= htmlspecialchars($member['name']); ?></h3>
                        <p class="member-id">NIM: <?= htmlspecialchars($member['student_id']); ?></p>
                        <a href="index.php?id=<?= $id; ?>" class="btn">Read Profile</a>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>
