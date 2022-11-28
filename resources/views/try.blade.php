<style>
    img {
        background-color: grey;
        height: 100%;
        width: 100%;
        border: 1px solid grey;
        margin-top: 20px;
        box-shadow: 0 8px 6px -6px black;
    }
</style>
<div class="container">
    <div class="row">
        @for ($i = 1; $i <= 16; $i++)
            <div class="col-md-6">
                {{-- src="{{ url('') }}/image/cikiganteng.jpeg" --}}
                <img data-original="{{ url('') }}/image/cikiganteng.jpeg" data-ke="{{$i}}" />
            </div>
        @endfor
    </div>
</div>
