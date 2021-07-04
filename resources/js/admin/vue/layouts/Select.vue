<template>
	<div class="form-group">
		<label> {{ label || 'Label not passed' }}: </label>

		<div class="select" v-click-outside="hide">
			<button
				type="button"
				:title="!iterables.length"
				@click="open = !open"
				:class="{ open: open }"
			>
				<span v-text="selected || '--- Select ---'"></span>

				<div>
					<svg viewBox="0 0 32 32">
						<path
							d="M16 28l-7-7l1.41-1.41L16 25.17l5.59-5.58L23 21l-7 7z"
							fill="currentColor"
						/>
						<path
							d="M16 4l7 7l-1.41 1.41L16 6.83l-5.59 5.58L9 11l7-7z"
							fill="currentColor"
						/>
					</svg>
				</div>
			</button>

			<ul v-show="open" ref="dropdown">
				<template v-if="iterables.length > 0">
					<li
						v-for="iterable in iterables"
						:key="iterable.id"
						@click="select(iterable)"
					>
						{{ iterable.name }}
					</li>
				</template>

				<template v-else>
					<li class="empty">No elements at the moment</li>
				</template>
			</ul>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'Select',
		props: {
			label: String,
			model: String,
			iterables: Array,
		},
		data() {
			return {
				open: false,
				selected: '',
			}
		},
		methods: {
			select(item) {
				this.open = false

				this.selected = item.name

				this.$emit('selected', {
					model: this.model,
					id: item.id,
				})
			},
			hide() {
				this.open = false
			},
		},
	}
</script>
