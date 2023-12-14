<!-- <div class="flex items-center justify-center ">
    <div class="px-4 py-2 relative flex justify-between  ">
        <div class="px-1 peer flex justify-between w-20">
            <div class="peer-hover:bg-slate-500">
                <button class="p-2 text-white text-sm" >

                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="16" height="16" fill="currentColor">
                        <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM7 6v2a3 3 0 1 0 6 0V6a3 3 0 1 0-6 0zm-3.65 8.44a8 8 0 0 0 13.3 0 15.94 15.94 0 0 0-13.3 0z">

                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="absolute bg-white px-1 py-2 top-10 left-0 border w-32 rounded-lg  invisible peer-hover:visible">
            <ul class=" flex flex-col items-start w-28">
                <li onclick="changepage('user_registration.php')" class="py-1 border-b w-28 hover:bg-slate-200 "><a href="./user_registration.php">Edit Profile</a></li>
                <li class="py-1 border-b w-28 hover:bg-slate-200"><a href="#">My Cart</a></li>
                <li class="py-1 border-b w-28 hover:bg-slate-200"><a href="./login.php">Login</a></li>
                <li class="py-1 border-b w-28 hover:bg-slate-200"><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<script>
    function changepage(page){
        window.location.href = page;
        
    }
</script> -->

<!-- <select name="options" id="options" class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  px-4 py-2 ">
    <option value="all">Options</option>
    <option value="login"><a href="./user_login.php">Login</a></option>
    <option value="logout"><a href="./user_logout.php">Logout</a></option>
</select> -->

<select name="formal" class="appearance-none bg-[#2370f4] text-white text-sm cursor-pointer" onchange="javascript:handleSelectedOption(this)">
<option class="text-white text-sm" value="">User Options</option>
<option class="<?php echo isset($_SESSION['loginUser'])? "visible" :"hidden"; ?> "  value="userpanel">Edit Profile</option>
<option class="<?php echo isset($_SESSION['loginUser'])? "visible" :"hidden"; ?> "value="mybooks">Mybooks</option>
<option class="<?php echo !isset($_SESSION['loginUser'])? "visible" :"hidden"; ?> " value="user_login">Login</option>
<option class="<?php echo isset($_SESSION['loginUser'])? "visible" :"hidden"; ?> " value="user_logout">Logout</option>
</select>

<script type="text/javascript">
  function handleSelectedOption(element)
  {
     window.location = element.value+".php";
  }
</script>