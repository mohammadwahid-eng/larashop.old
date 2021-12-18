<template>
	<div class="card-widget" :class="{ active: isActive }">
		<div class="cw-header">
			<span class="name" @click="isActive = !isActive">{{ attribute.name }}</span>
			<span class="action" @click="$emit('remove', attribute)">Remove</span>
		</div>
		<div class="cw-body">
			<div class="form-group">
				<label for="attribute[]_values">Value(s)</label>
				<input type="text" class="form-control" id="attribute[]_values" name="attribute[]_values">
				<div class="d-flex mt-1 gap-1">
					<button type="button" class="btn btn-sm btn-light">Select All</button>
					<button type="button" class="btn btn-sm btn-light">Select None</button>
					<button type="button" class="btn btn-sm btn-primary ml-auto">Add New</button>
				</div>
			</div>
			<div class="form-group" v-if="product_type == 'variable'">
				<label class="w-100" for="used_for_variations">Used for variations</label>
				<label class="custom-switch pl-0">
					<input type="checkbox" name="used_for_variations" id="used_for_variations" class="custom-switch-input">
					<span class="custom-switch-indicator"></span>
					<span class="custom-switch-description">Yes</span>
				</label>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['attribute', 'product_type'],
		emits: ['remove'],
		data() {
			return {
				isActive: true,
			}
		},
		methods: {
			
		}
	}
</script>