<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>

    @if(session('flash'))
        <div class="alert shadow-md min-w-52 flex justify-between items-center bg-green-500 text-white fixed top-5 right-10 gap-10 text-lg py-1 px-2 border border-neutral-500 rounded ">
            <p>{{ session('flash') }}</p>
            <span class="cursor-pointer">x</span>
        </div>

        <script>
            const alert = document.querySelector('.alert');
            alert.querySelector('span').addEventListener('click', () => { alert.classList.add('hidden'); });
            setTimeout(() => { alert.classList.add('hidden'); }, 3000);
        </script>
    @endif

    <div class="w-full h-screen flex justify-center items-center overflow-hidden">
        <form action="/" method="POST" class="w-2/5 border border-neutral-500 rounded p-4 shadow-md flex flex-col gap-4 bg-[rgb(250,250,250)]">
            @csrf

            <h1 class="text-2xl font-medium text-center">Send Email</h1>
            
            <div class="input-container">
                <label for="to">To</label>
                <input required id="to" name="to" type="text" placeholder="To">
            </div>
            
            <div class="input-container">
                <label for="subject">subject</label>
                <input required id="subject" name="subject" type="text" placeholder="Subject">
            </div>
            
            <div class="input-container">
                <label for="content">content</label>
                <textarea required name="content" id="content" rows="10" placeholder="Content"></textarea>
            </div>

            <button type="submit" class="border border-neutral-500 bg-zinc-100 hover:bg-zinc-200 rounded shadow-md py-2 outline-blue-800">Send Email</button>
        </form>
    </div>  
</body>
</html>