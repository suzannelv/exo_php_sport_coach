<?php
require_once "./functions.php";
if(!isset($_GET['q'])) {
    redirect("index.php");
};

['q' => $search] = $_GET;
$abilityId = isset($_GET['skill']) ? intval($_GET['skill']) : null;
if ($abilityId === 0) {
    $abilityId = null;
}


require_once "./components/head.php";
require_once "./data/members.php";
require_once "./data/abilities.php";
?>


<h2 class="text-3xl font-bold text-center mb-8">Résultat de recherche pour <?php echo $search; ?></h2>

<?php
$membersFound = []; // initialisation
$abilitySelected = intval($_GET['ability']); // id

// foreach($members as $member) {
//     $memberFullName = getFullName($member);
//     if (stripos($memberFullName, $_GET['q']) !== false) {
//         foreach($member['abilities'] as $abilityId) {
//             if($abilityId == $abilitySelected) {
// $membersFound[] = $member;?>

     <?php require "./components/members/member-card.php";

//             }
//         }
//     }
// }

if(empty($memberFound)) { ?>
  <h2 class="text-2xl text-center">Nous n'avons pas trouvé le coach!</h2>
 
<?php }


// solution 1: recommandée de Lucas
// if(!isset($_GET["q"])){
//   redirect("index.php");
// }

// $result= array_filter($member, function(array $member):bool {
// return stripos(getFullName($member), $_GET['q']) !== false;
// });

// foreach($result as $member){
//     require './components/members/member-card.php';
// }

// solution 2 de Luacs

// $result = findMember($members, $_GET['q'] );
// foreach($result as $member){
//     require './components/members/member-card.php';
// }
require_once "./components/foot.php";
require_once "./components/footer.php"; ?>
