@props(['disabled' => false,  'onChange' => ''])

<div class="relative" x-data="dropdownComponent({{ $onChange }})" x-init="initSelect2">
    <select x-ref="select" x-model="selectedOption" {{ $attributes->merge(['class' => 'select2 block appearance-none w-full text-gray-400 bg-white border border-gray-300 py-2 pl-3 pr-10 sm:text-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500']) }}>
        {{ $slot }}
    </select>
</div>

<script>
    function dropdownComponent(onChangeCallback) {
        return {
            selectedOption: null,
            initSelect2() {
                // Initialize Select2
                $(this.$refs.select).select2({ width: '100%' });
                // Handle Select2 change event
                $(this.$refs.select).on('select2:select select2:unselect', (event) => {
                    this.selectedOption = $(event.target).val();
                    this.handleChange(this.selectedOption);
                });
            },
            handleChange(event) {
                // Call the provided callback function if available
                if (typeof onChangeCallback === 'function') {
                    onChangeCallback(parseInt(this.selectedOption));
                } else {
                    console.log('No callback function provided');
                }
            }
        }
    }
</script>
