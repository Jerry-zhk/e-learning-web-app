@extends('layouts.app')

@section('content')

<section class="section has-text-centered">
    <h1 class="is-size-2 has-text-grey has-text-weight-bold">Coding at its finest!</h1>
    <h2 class="is-size-5 has-text-grey-light has-text-weight-semibold">A modern way to learn coding. Take a deep breath, select one of the topics, have fun.</h2>
    <hr>
    <img src="{{ asset('img/welcome3.jpg') }}" height="10%"/>
</section>

@if(isset($new_tutorials))
<section class="section">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <h5 class="title is-5">New Purchased Tutorials</h5>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <a href="#">
                    Show All
                </a>
            </div>
        </div>
    </div>
    <div class="columns is-multiline">
        @foreach($new_tutorials as $tutorial)
        <div class="column is-one-third">
            <a href="{{ route('tutorial.public', ['tutorial4public' => $tutorial->slug]) }}">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">{{ $tutorial->title }}</p>
                                <p class="subtitle is-6">@ {{ $tutorial->series->title }}</p>
                            </div>
                        </div>
                        <div class="content" style="text-overflow: ellipsis; height: 48px; overflow: hidden;">
                            Introduction: 
                            <?php 
                            $bodyWithoutTags = strip_tags($tutorial->body);
                            echo (strlen($bodyWithoutTags) > 250) ? substr($bodyWithoutTags, 0, 250) . '...' : $bodyWithoutTags;
                            ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
@endif
<section class="section">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <h5 class="title is-5">Popular Series</h5>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <a href="#">
                    Show All
                </a>
            </div>
        </div>
    </div>
    <div class="columns is-multiline">
        @foreach($popularSeries as $series)
        <div class="column is-one-third">
            <a href="{{ route('series.public', ['series' => $series->id]) }}">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">
                                    {{ $series->title }} 
                                    @if($series->price == 0)
                                    <span class="tag is-success">FREE</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="content" style="text-overflow: ellipsis; height: 96px; overflow: hidden;">
                            Popularity: {{ $series->purchase_count }} / # of Tutorials: {{ $series->tutorials->count() }}
                            <br>
                            Skills: 
                            @foreach($series->skills as $skill)
                            <span class="tag">{{ $skill->display_name }}</span>
                            @endforeach
                            <br>
                            Description: {{ $series->description }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
<section class="section">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <h5 class="title is-5">New Series</h5>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <a href="#">
                    Show All
                </a>
            </div>
        </div>
    </div>
    <div class="columns is-multiline">
        @foreach($newSeries as $series)
        <div class="column is-one-third">
            <a href="{{ route('series.public', ['series' => $series->id]) }}">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">
                                    {{ $series->title }} 
                                    @if($series->price == 0)
                                    <span class="tag is-success">FREE</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="content" style="text-overflow: ellipsis; height: 96px; overflow: hidden;">
                            Popularity: {{ $series->purchase_count }} / # of Tutorials: {{ $series->tutorials->count() }}
                            <br>
                            Skills: 
                            @foreach($series->skills as $skill)
                            <span class="tag">{{ $skill->display_name }}</span>
                            @endforeach
                            <br>
                            Description: {{ $series->description }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
<section class="section">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <h5 class="title is-5">Free Series</h5>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <a href="{{ route('profile.edit') }}">
                    Show All
                </a>
            </div>
        </div>
    </div>
    <div class="columns is-multiline">
        @foreach($freeSeries as $series)
        <div class="column is-one-third">
            <a href="{{ route('series.public', ['series' => $series->id]) }}">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">
                                    {{ $series->title }} 
                                    @if($series->price == 0)
                                    <span class="tag is-success">FREE</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="content" style="text-overflow: ellipsis; height: 96px; overflow: hidden;">
                            Popularity: {{ $series->purchase_count }} / # of Tutorials: {{ $series->tutorials->count() }}
                            <br>
                            Skills: 
                            @foreach($series->skills as $skill)
                            <span class="tag">{{ $skill->display_name }}</span>
                            @endforeach
                            <br>
                            Description: {{ $series->description }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>

@endsection
