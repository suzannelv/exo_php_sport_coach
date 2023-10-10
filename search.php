<?php
require_once 'functions.php';

if (!isset($_GET['q'])) {
    redirect('index.php');
}

['q' => $search] = $_GET;
$abilityId = isset($_GET['skill']) ? intval($_GET['skill']) : null;
if ($abilityId === 0) {
    $abilityId = null;
}

require_once "./components/head.php";
require_once "./data/members.php";
require_once "./data/abilities.php";
?>

<main class="mx-auto">
  <h1 class="text-center text-3xl mb-5">Résultats de la recherche pour "<?php echo $search; ?>"</h1>
  
  <div>
    <?php
    // foreach (boucle)
    // foreach ($members as $member) {
    //     if (stripos(getFullName($member), $search) !== false) {
    //         require 'templates/member-card.php';
    //     }
    // }

    $results = findMembers($members, $search, $abilityId);

foreach ($results as $member) {
    require './components/members/member-card.php';
}

if (empty($results)) {
    echo "Nous n'avons pas trouvé le coach!";
} ?>
  </div>
</main>

<?php
require_once "./components/foot.php";
require_once "./components/footer.php";
