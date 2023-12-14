<?php
require_once 'admin_loginhandler.php';
require_once 'database.php';
//require_once 'user_record.php';
if(!isset($_SESSION['admin_Login'])){
    header('location:admin_login.php');
}

?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Admin panel">
    <meta name="description" content="This is a admin page with table and graph">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>

<body>
    <!-- <header class="md:pl-[14rem] bg-white shadow-md">
        <nav class="flex py-2 gap-1">
            <svg class="w-8 h-8 md:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 8h12M6 12h12M6 16h12"></path></svg>
            <div class="w-full flex justify-between pr-8">
            <form action="#" class="2/3 pl-4">
                <div class="relative w-full flex">
                    <input type="search" name="search" id="search" placeholder="Search for Projects"
                        class="w-full border h-8 shadow  rounded-md py-4 pl-8 bg-slate-100 focus:outline-indigo-200">
                    <svg class="w-5 h-5 absolute top-2 left-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z"
                            fill="currentColor">
                        </path>
                    </svg>
                </div>
            </form>
            </div>
        
        <div class="flex items-center gap-4">
            <svg class="w-6 h-6 text-indigo-800" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                viewBox="0 0 16 16">
                <path
                    d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
                </path>
            </svg>
            <svg class="w-6 h-6 text-indigo-800" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                </path>
            </svg>
            <img src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                alt="" class="w-6 h-6 rounded-full">
        </div>
        </nav>
    </header> -->



    <header class="p-0 md:pl-[16rem] text-purple-800 pt-2">
        <nav class="flex py-2 gap-1 ">

            <svg class="w-8 h-8 md:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 8h12M6 12h12M6 16h12"></path>
            </svg>


            <div class="w-full flex justify-between pr-8">


                <form method="get" class="w-2/3 pl-4">

                    <div class="relative w-full flex">
                        <input type="text" name="q"
                            class="w-full border h-8 shadow py-4 pl-8 rounded-xl bg-slate-100 focus:outline-indigo-200"
                            placeholder="search" autocomplete="off">
                        <svg class="w-5 h-5 absolute top-2.5 left-1" xmlns="http://www.w3.org/2000/svg" role="img"
                            viewBox="0 0 24 24" aria-labelledby="searchIconTitle" fill="none" stroke="currentColor">
                            <title id="searchIconTitle">Search</title>
                            <path d="M14.4121122,14.4121122 L20,20"></path>
                            <circle cx="10" cy="10" r="6"></circle>
                        </svg>

                    </div>

                </form>
            </div>
            <div class="flex gap-2 pt-2">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
                    </path>
                </svg>



                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z">
                    </path>
                </svg>
                
                <?php foreach($_SESSION['admin_Login'] as $value): ?>
                <button type="submit" value="<?php echo $value['name']; ?>">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  width="16" height="16" fill="currentColor">
                    <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM7 6v2a3 3 0 1 0 6 0V6a3 3 0 1 0-6 0zm-3.65 8.44a8 8 0 0 0 13.3 0 15.94 15.94 0 0 0-13.3 0z">

                    </path>
                </svg>
                <?php echo $value['admin_Id']; ?>    
                <?php endforeach ?>
                </button>

                
            </div>

        </nav>
    </header>
    <aside class="hidden md:block w-[16rem] h-full fixed inset-y-0 bg-white shadow-md overflow-y-auto pt-2">
        <nav class="flex flex-col">
            <a class="block pl-6 font-bold text-xl">
               Admin Dashboard
            </a>
            <ul class="pl-4 py-6 space-y-6 text-gray-600 font-semibold">
                <li class="hover:text-black">
                    <a href="#" class="flex gap-4 items-center">
                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"></path></svg>
                        <span>Users</span>
                    </a>
                </li>

                <li class="hover:text-black">
                    <a href="#" class="flex gap-4 items-center">
                        <span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25">
                        </path>
                        </svg>
                        </span>
                        <span>Books</span>
                    </a>
                </li>

                <li class="hover:text-black">
                    <a href="#" class="flex gap-4 items-center">
                        <span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="hover:text-black">
                    <a href="#" class="flex gap-4 items-center">
                        <span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <span>Charts</span>
                    </a>
                </li>

                <li class="hover:text-black">
                    <a href="#" class="flex gap-4 items-center">
                        <span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <span>Buttons</span>
                    </a>
                </li>

                <li class="hover:text-black">
                    <a href="#" class="flex gap-4 items-center">
                        <span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <span>Modals</span>
                    </a>
                </li>

                <li class="hover:text-black">
                    <a href="#" class="flex gap-4 items-center">
                        <span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <span>Tables</span>
                    </a>
                </li>

                <li class="hover:text-black">
                    <a href="#" class="flex gap-4 items-center">
                        <span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </span>
                        <Details>
                            <summary class="flex items-center gap-4"> <span>Pages</span> 
                            <span><svg class="w-5 h-5"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480" fill="currentColor">
                                        <title>down</title>
                                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                                    </svg></span> </summary>
                            <ul>
                                <li>Login</li>
                                <li>Create Account</li>
                                <li>Forgot Password</li>
                            </ul>
                        </Details>
                    </a>
                </li>
                <li class="py-6">
                    <a href="register.php" class="bg-indigo-600 rounded-md  text-white py-2 px-6">Create Account</a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="sm:overflow-auto pl:0 md:pl-[16rem]">
        <header>
            <h1 class="font-bold text-2xl py-6">Dashboard</h1>
        </header>

        <section class="grid  grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 mb-4">
            <article class="flex gap-3 pl-3 border py-4 rounded-lg shadow-md">
                <div class="">
                    <svg class="w-12 h-12 bg-orange-200 p-3 rounded-full fill-orange-600 stroke-orange-600"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2>Total clients</h2>
                    <span>6389</span>
                </div>
            </article>

            <article class="flex gap-3 pl-3 border py-4 rounded-lg shadow-md">
                <div class="">
                    <svg class="w-12 h-12 bg-orange-200 p-3 rounded-full fill-orange-600 stroke-orange-600"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2>Total clients</h2>
                    <span>6389</span>
                </div>
            </article>

            <article class="flex gap-3 pl-3 border py-4 rounded-lg shadow-md">
                <div class="">
                    <svg class="w-12 h-12 bg-orange-200 p-3 rounded-full fill-orange-600 stroke-orange-600"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2>Total clients</h2>
                    <span>6389</span>
                </div>
            </article>

            <article class="flex gap-3 pl-3 border py-4 rounded-lg shadow-md">
                <div class="">
                    <svg class="w-12 h-12 bg-orange-200 p-3 rounded-full fill-orange-600 stroke-orange-600"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2>Total clients</h2>
                    <span>6389</span>
                </div>
            </article>
        </section>

        <section class="grid grid-flow-row w-full">
            <?php
             $db = new Database();
             $db->sql("select * from users left join image_file on users.userId = image_file.userId");
             while($rows =  $db->getResult()){
            ?>
            <div class="space-y-4 justify-between w-full border ">
            <div class="flex justify-between font-semibold border-b  rounded-md items-center pl-6 gap-4 py-3 w-full">
                <p>Profile</p>
                <p>Name</p>
                <p>Email</p>
                <p>Phone</p>
                <p>Gender</p>
                <p>Address</p>
                <p>Date_created</p>
                <p>Date_modified</p>
                <p>Status</p>
                <p>Action</p>
                </div>
                <?php 
                foreach($rows as $row):?>
             
                <div class="flex justify-between border-b rounded-md items-center pl-6 py-3 gap-6">
                    <img class="w-12 h-14 rounded-md" src="<?php echo '../uploads/'.$row['unique_name']; ?>"/>
                    <p class="font-semibold"><?php echo $row['name'];?></p>
                    <p class="text-sm text-gray-700"><?php echo $row['email'];?></p>
                    <p class="text-sm"><?php echo $row['phone'];?></p>
                    <p class="text-sm"><?php echo $row['gender'];?></p>
                    <p class="text-sm"><?php echo $row['address'];?></p>
                    <p class="text-sm pr-2"><?php echo $row['date_created'];?></p>
                    <p class="text-sm pr-2"><?php echo $row['date_modified'];?></p>
                    <p class="font-medium text-sm text-green-800 bg-emerald-100 rounded-xl px-2">Active</p>
                    <a class="border bg-blue-800 text-white text-sm  px-4 py-2 rounded-md" href="delete.php?userId=<?php echo $row['userId'];?>">delete</a>
                </div>
                <?php  endforeach ?>
                <?php }?> 
            </div>
            

        </section>
    </main>
</body>
</html>