<div>
    <h2>Login</h2>
    <form wire:submit.prevent="login">
        <!-- Campo de Email -->
        <div class="form-group">
            <label>
                Email<input type="email" wire:model="email" id="email" name="email" required/>
            </label>
        </div>
        <!-- Campo de Password -->
        <div class="form-group">
            <label>
                Contraseña:<input type="password" wire:model="password" id="password" name="password" required/>
            </label>
        </div>
        <!-- Botón -->
        <div class="form-group">
            <button type="submit">prueba</button>
        </div>
    </form>
</div>