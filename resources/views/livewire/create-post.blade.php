<div>
    <h1>PUBLICAR POST</h1>
    <form wire:submit.prevent="create_post">
        <input type="text" name="title" id="title" wire:model="title" placeholder="title">
        <input type="text" name="subtitle" id="subtitle" wire:model="subtitle" placeholder="subtitle">
        <label for="content">Contenido:</label>
        <textarea name="content" id="content" name="content" wire:model="content" cols="30" rows="10"></textarea>
        <button type="submit">Publish</button>
    </form>
</div>
