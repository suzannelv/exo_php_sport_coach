<?php
$title = "member";
require_once "./components/head.php";
require_once "./data/members.php";
require_once "./functions.php";
;?>

<main class="prose-lg mx-auto text-center">
  <?php
  if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      // interrompre l'exécution du scipt : sortir prématurément
      http_response_code(404);
      // require_once "pageError.php";
      echo "coach non trouvé";
      exit;
  }

// Si j'arrive à ce niveau du code, cela signifie que
// l'ID existe et a bien une valeur numérique
  // ['id' => $id] = $GET['id'];
$id = intval($_GET['id']);

// 使用array_search来查找与$id匹配的成员的键
$memberId = array_column($members, 'id');
$key = array_search($id, $memberId);
// var_dump($key);

// 检查是否找到匹配的成员
if($key === false) {
    http_response_code(404);
    require_once "pageError.php";
    // echo "coach non trouvé";
    exit;
}

$member = $members[$key]; // 获取匹配的成员

// 输出成员信息
?>
      <div class="flex justify-center flex-col mx-auto mt-10">
        <h1 class="mt-10">Super coach : <?php echo $member['firstname'] . ' ' . $member['name'] ?></h1>

        <figure class="relative text-center max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 mx-auto">
          <a href="#">
            <img class="rounded-lg" src="<?php echo $member['picture'] ?>" alt="<?php echo getFullName($member) ?>">
          </a>
          <figcaption class="absolute px-4 text-lg text-white bottom-6">
            <p><?php echo $member['quote'] ?></p>
          </figcaption>
        </figure>

        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> <strong>Date de naissance</strong>: <?php echo $member['birthDate']  ?></p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Compétences</strong>: 
        <?php

      foreach($member['abilities'] as $abilityId) {
          $ability = findAbility($abilities, $abilityId); ?> 
          <span ><?php echo $ability['name'] ?></span>
          <?php } ?>
          
        </p>

        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">   <strong>Citation</strong>: <?php echo $member['quote'] ?></p>
      </div>

  </main>


<?php require_once "./components/foot.php" ?>
