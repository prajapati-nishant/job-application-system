<div>
    @php($random = rand(1, 100))
    <select name="{{ $name }}" id="{{  str_replace('.','_',$name).$random }}" wire:model="{{ $name }}"
            class="select select-bordered select2 w-full @if(!empty($class)) {{ $class }} @endif @error($name) select-error @enderror"
            @if(!empty($allowClear)) data-allow-clear="true" @endif
            @if(!empty($inputAttributes))
            @foreach($inputAttributes as $key=>$value)
            @if(is_numeric($key))
            {{ $value }}
            @elseif(is_bool($value))
            {{ $value?$key:'' }}
            @else
            {{ $key.'='.$value }}
            @endif
            @endforeach
            @endif
            x-data="{value: @entangle($attributes->wire('model'))}"
            x-init="()=>{
             $(document).ready(function() {
                $('#{{ str_replace('.','_',$name).$random }}').select2({
                    placeholder: '{{ !empty($placeholder)? $placeholder :__('Choose').'...' }}',
                    width: '100%',
                    allowClear: {{ !empty($allowClear) ? 'true':'false' }},
                    tags: {{ !empty($tags) ? 'true':'false' }},
                    @if(!empty($max))
                    maximumSelectionLength: {{ $max }},
                    language: {
                        maximumSelected: function (args) {
                            return '{{ __('messages.select2_max_selection',['max'=>$max]) }}';
                        }
                    },
                    @endif
                }).on('select2:open',function(){
                    $('#select2-{{ str_replace('.','_',$name) }}-container').find('.select2-search__field').focus();
                });

                $(document).on('change','#{{ str_replace('.','_',$name).$random }}', function (e) {
                    var data = $(this).select2('val');
                    value = data;
                });
             });
        }"
    >
        @if(!empty($options) && count($options))
            @foreach($options as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </select>
</div>
