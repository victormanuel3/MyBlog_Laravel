<div class="container_create_post">
    <i wire:click="$dispatch('closeModal')" class="close_create_post bi bi-x"></i>
    <h1>
        {{$editMode ? 'Modify post' : 'Publish post'}}
    </h1>
    <form wire:submit.prevent= {{$editMode ? "modifyPost" : "createPost"}}>
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
                        placeholder="Enter the content">
                        </textarea>
                @error('content')
                    <p class="error_field">{{ $message }}</p>
                @enderror
            </label>
            {{--  ------------------------------------------------------ --}}
            <label>
                Category
                <select wire:model.live="selectedCategory">
                    <option selected value="">Add a category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
                {{-- Validación de error --}}
                @error('categories_select')
                    <p class="error_field">{{ $message }}</p>
                @enderror
            </label>
            <div class="list_categories">
                <ul>
                    @foreach ($categoriesSelect as $index=>$categoryId)
                        @php
                            $category = $categories->find($categoryId);
                        @endphp
                        <li>
                            {{$category->category}}
                            <i wire:click="deleteCategory({{$index}})" class="fa-sharp fa-light fa-xmark"></i>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- ---------------------------------------------------- --}}
        </div>
        <button type="submit">
            {{$editMode ? 'Modify post' : 'Create post'}} 
            <i class="fa-sharp fa-regular fa-pen-line"></i>
        </button>
    </form>
</div>
