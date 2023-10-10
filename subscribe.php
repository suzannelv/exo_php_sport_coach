<?php
require_once "./components/head.php";
require_once "./data/errorMsgs.php";
require_once "./functions.php";

// $email = isset($_GET['email']) ? $_GET['email'] : " ";
$email = $_GET['email'] ?? "";
?>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 ">
       
        <h2 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Rien ne peut vous arrêter ici.</h2>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Rejoignez les <?php echo getTotalEmail(); ?> inscrits à la newsletter.</p>

        <?php if (isset($_GET['error'])) { ?>
            <div class="mb-3">
                <span class="text-red-500 bg-red-100 py-1 px-2">
                    <?php echo getErrorMessage(intval($_GET['error'])); ?>
                </span>
            </div>
        <?php } ?>


        <!-- form -->
        <form class="w-full max-w-md mx-auto " action="subscribe_process.php" method="POST">   
            
        
            <label for="email" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Email sign-up</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                </div>
                
                <input type="email" id="email" name="email" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Entrer votre mail ici..." value = "<?php echo $email; ?>" required>
                
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">abonnez-vous</button>
            </div>
        </form>
    </div>
  
</section>
<?php
require_once "./components/foot.php";
require_once "./components/footer.php";
