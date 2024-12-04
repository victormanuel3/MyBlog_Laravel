<div class="container_create_post">
    <i wire:click="$dispatch('closeModal')" class="close_create_post bi bi-x"></i>
    <h1>
        {{$editMode ? 'Modify post' : 'Publish post'}}
    </h1>
    <form wire:submit.prevent= {{$editMode ? "modify_post" : "create_post"}}>
        <div class="container-ipt_post">
            <label>
                Title<input type="text" wire:model="title" placeholder="Enter the title">
                @error('title')
                    <p class="error_field">{{ $message }}</p>
                @enderror
            </label>
            <label>
                Subtitle<input type="text" wire:model="subtitle" placeholder="Enter the subtitle">
                @error('subtitle')
                    <p class="error_field">{{ $message }}</p>
                @enderror
            </label>
            <label>
                Content<textarea wire:model="content" 
                        cols="30" rows="10" 
                        placeholder="Enter the content">
                        </textarea>
                @error('content')
                    <p class="error_field">{{ $message }}</p>
                @enderror
            </label>
        </div>
        <button type="submit">
            {{$editMode ? 'Modify post' : 'Create post'}} 
            <i class="fa-sharp fa-regular fa-pen-line"></i>
        </button>
    </form>
</div>
