<?php  require_once "functions.php"?>

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 mx-auto">
    
    <img class="rounded-t-lg m-0 p-0 h-64 w-full
    " src="<?php echo $member['picture'] ?>" alt="<?php echo $member['name'] ?>" class="p-0" />
   
    <div class="pt-5 pb-6 px-3">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo getFullName($member) ?></h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> <strong>Date de naissance</strong>: <?php echo $member['birthDate']  ?></p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Compétences</strong>: 
           <div class="d-flex flex-cols items-center justify-center">
        <?php

          foreach($member['abilities'] as $abilityId) {
              $ability = findAbility($abilities, $abilityId);?>
            <span class=" bg-[#edf2f4] py-1 px-3 rounded-full mb-3"><?php echo  $ability['name'] . '<br/>'; ?></span>

         <?php } ?>
          </div>
         </p>

         <blockquote class="mb-3 font-normal text-gray-700 dark:text-gray-400"> <strong>Citation</strong>: 
          <?php echo $member['quote'] ?>
         </blockquote>
        <a href="member.php?id=<?php echo $member['id']; ?>" class="inline-flex items-center px-3 py-2 mb-5 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Savoir plus
             <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
