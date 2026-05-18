<?php
$members = [
    1 => [
        'name' => 'Muhamad Febrian',
        'student_id' => '001202505021',
        'major' => 'Informatics',
        'batch' => '2025',
        'image' => 'images/febri.jpg',
        'background' => 'My name is Muhamad Febrian, and I am passionate about software and technology development. I enjoy creating various prototype projects, ranging from mobile applications and web development to hardware-based systems using platforms such as ESP32 and other IoT devices. I am highly interested in learning new technologies, improving my development skills, and building user-friendly, innovative solutions through both software and hardware integration.',
    ],
    2 => [
        'name' => 'Fajar Firman Firdaus',
        'student_id' => '001202505029',
        'major' => 'Informatics',
        'batch' => '2025',
        'image' => 'images/fajar.jpg',
        'background' => 'I am Fajar Firman Firdaus, a student with a strong passion for software development and IoT technology. Currently, I am actively deeply exploring frontend and backend development, as well as database management, to build integrated systems. With experience in creating various prototype projects—ranging from web and mobile applications to hardware-based systems using ESP32—I am always eager to explore new technologies and enhance my programming skills',
    ],
    3 => [
        'name' => 'Fauzan Ibnu Z. N.',
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
                        <img
                            src="<?= htmlspecialchars($selectedMember['image']); ?>"
                            alt="<?= htmlspecialchars($selectedMember['name']); ?>"
                            class="<?= $selectedId === 2 ? 'photo-zoom' : ($selectedId === 3 ? 'photo-lower' : ''); ?>"
                        >
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

                <a href="index.php" class="btn-back">&larr; Back</a>
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
                            <img
                                src="<?= htmlspecialchars($member['image']); ?>"
                                alt="<?= htmlspecialchars($member['name']); ?>"
                                class="<?= $id === 2 ? 'photo-zoom' : ($id === 3 ? 'photo-lower' : ''); ?>"
                            >
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
