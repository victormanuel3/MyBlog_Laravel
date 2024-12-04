<div class="container_login">
    <i wire:click="$dispatch('closeModal')" class="close_login bi bi-x"></i>
    <h1>Login</h1>
    <form wire:submit.prevent="login">
        <div class="container-ipt">
            <label>
                Email<input type="email" wire:model="email" id="email" name="email" 
                placeholder="enter the email"  
                required/>
            </label>
            <label>
                Contraseña
                <input type="password" wire:model="password" 
                placeholder="enter the password" 
                id="password" 
                name="password" required/>
            </label>
        </div>
        <button type="submit">Login<i class="bi bi-arrow-right"></i></button>
    </form>
</div>