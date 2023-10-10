<?php
$title = "Accueil";
require_once "./components/head.php";
require_once "./data/members.php";
require_once "./data/abilities.php";

?>
  
 <main class="prose-lg mx-auto text-center ">  
    <section class="bg-center bg-no-repeat bg-cover  bg-gray-700 bg-blend-multiply w-full banner">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Plus fort, plus rapide, plus en forme.</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Du lundi au samedi, ils sauront vous motiver et vous aider à vous surpasser lors des sessions de Grit, Body Sculpt et Cross Training. Si vous préférez cibler une zone localisée, laissez-vous tenter par le 100% Abdos ou le cours d’abdos fessiers.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                  C'est parti!
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="#" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Savoir plus
                </a>  
            </div>
        </div>
    </section>


    <div class="content flex flex-1 flex-col items-center">
        <h1 class="mt-8">Notre équipe</h1>
        <h2><?php echo count($members) . " coaches pour vous accompagner"?></h2>

        <form class="flex items-center mb-8" method="GET" action="search.php" >   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                    </svg>
                </div>
                <input type="text" id="simple-search" name="q" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Chercher un coach..." >
            </div>

            <label for="abilities" class="block mb-2 text-sm mx-4 font-medium text-gray-900 dark:text-white">Compétences</label>
            <div> 
          
                <select id="ability" name="skill" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option >-- Compétence --</option>
                    
                       <?php
                         foreach($abilities as $ability) { ?>
                           <option value="<?php echo $ability['id']; ?>">  
                             <?php  echo $ability['name'];
                             ?>  
                           </option>
                        <?php } ?>
                  
                   
                </select>
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:mx-0">
            <?php foreach($members as $member) {?>
                <?php require "./components/members/member-card.php"; ?>
            <?php } ?>
        </div>
    </div>

  
 </main>

<?php

require_once "./components/footer.php";
require_once "./components/foot.php";
