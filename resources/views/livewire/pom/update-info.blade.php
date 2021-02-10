<div class="single__left">
	<h2 class="single__left--name">
		{{ $pom->name }} 
		<span>
			({{ ($pom->is_published == 1) ? 'published' : 'not published' }})
		</span>

		<svg class="gender-svgs">
			<use xlink:href="/sprite.svg#{{ 
				($pom->gender == 'male') ? 'male' : 'fem'
				}}">
			</use>
		</svg>
	</h2>

	<div class="single__left--info">
		<ul>
			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.nameInput.focus())}"> 
				Name:
				<span x-show="showSpan">{{ $pom->name }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="name" placeholder="{{ $pom->name }}" x-ref="nameInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('name')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.colorInput.focus())}"> 
				Color:
				<span x-show="showSpan">{{ $pom->color }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="color" placeholder="{{ $pom->color }}" x-ref="colorInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('color')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.genderInput.focus())}"> 
				Gender:
				<span x-show="showSpan">{{ $pom->gender }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="gender" placeholder="{{ $pom->gender }}" x-ref="genderInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('gender')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.heightInput.focus())}"> 
				Height:
				<span x-show="showSpan">{{ $pom->height }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="height" placeholder="{{ $pom->height }}" x-ref="heightInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('height')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.weightInput.focus())}"> 
				Weight:
				<span x-show="showSpan">{{ $pom->weight }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="weight" placeholder="{{ $pom->weight }}" x-ref="weightInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('weight')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.teethInput.focus())}"> 
				Teeth:
				<span x-show="showSpan">{{ $pom->teeth }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="teeth" placeholder="{{ $pom->teeth }}" x-ref="teethInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('teeth')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.birthdayInput.focus())}"> 
				Birthday:
				<span x-show="showSpan">{{ $pom->birthday }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="birthday" placeholder="{{ $pom->birthday }}" x-ref="birthdayInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('birthday')">Save</button>
			</li>

			<hr> <!-- | -------------------------------------------- | -->

			<li> Published: <span wire:click="toggleParam('is_published')">{{ ($pom->is_published == 1) ? 'Yes' : 'No' }}</span></li>
			<li> For sale: <span wire:click="toggleParam('is_for_sale')">{{ ($pom->is_for_sale == 1) ? 'Yes' : 'No' }}</span></li>
			<li> Has fontanel: <span wire:click="toggleParam('has_fontanel')">{{ ($pom->has_fontanel == 1) ? 'Yes' : 'No' }}</span></li>
			<li> Puppy: <span wire:click="toggleParam('is_puppy')">{{ ($pom->is_puppy == 1) ? 'Yes' : 'No' }}</span></li>

			<hr> <!-- | -------------------------------------------- | -->
			
			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.fatherInput.focus())}"> 
				Father:
				<span x-show="showSpan">{{ $pom->father }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="father" placeholder="{{ $pom->father }}" x-ref="fatherInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('father')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.motherInput.focus())}"> 
				Mother:
				<span x-show="showSpan">{{ $pom->mother }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="mother" placeholder="{{ $pom->mother }}" x-ref="motherInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('mother')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.grandfatherInput.focus())}"> 
				Grandfather:
				<span x-show="showSpan">{{ $pom->grandfather }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="grandfather" placeholder="{{ $pom->grandfather }}" x-ref="grandfatherInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('grandfather')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.grandmotherInput.focus())}"> 
				Grandmother:
				<span x-show="showSpan">{{ $pom->grandmother }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="grandmother" placeholder="{{ $pom->grandmother }}" x-ref="grandmotherInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('grandmother')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.ownerInput.focus())}"> 
				Owner:
				<span x-show="showSpan">{{ $pom->owner }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="owner" placeholder="{{ $pom->owner }}" x-ref="ownerInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('owner')">Save</button>
			</li>

			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.breederInput.focus())}"> 
				Breeder:
				<span x-show="showSpan">{{ $pom->breeder }}</span>
				<input x-show="showInput" x-on:input="showButton = true" wire:model="breeder" placeholder="{{ $pom->breeder }}" x-ref="breederInput">
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('breeder')">Save</button>
			</li>

			<hr> <!-- | -------------------------------------------- | -->
			
			<li x-data="{ showSpan: true, showInput: false, showButton: false, focusChange: false }" x-on:click.away="showInput = false; showSpan = true; showButton = false" x-on:click="if (!focusChange) {showSpan = false; showInput = true; setTimeout(() => $refs.titlesInput.focus())}"> 
				Titles:
				<span x-show="showSpan">{{ $pom->titles }}</span>
				<textarea x-show="showInput" x-on:input="showButton = true" wire:model="titles" placeholder="{{ $pom->titles }}" x-ref="titlesInput"></textarea>
				<button x-show="showButton" x-on:click="focusChange = true; showInput = false; showSpan = true; showButton = false" wire:click.prevent="updateInfo('titles')">Save</button>
			</li>
		</ul>
	</div>
	
</div>