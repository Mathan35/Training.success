<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
       <div class = "submit-content">
           <h1>Answer the Following Questions</h1>
           @include('layouts.error-message')   
           @include('layouts.validation')  
           <div class = "card mt-4">
               <div class = "submit-body">
               <div class = "quiz-list">
                   <h1>{{$get_exam[0]['title']}}</h1>
                    <form action="{{route('validate_answer')}}" method="post">
                        @csrf
                        @forelse($get_Questions as $data)
                        <div class = "quiz-card home-list mx-3 mt-3">
                            <h2 class = "text-left">{{$data['question']}}</h2>
                            <input type="hidden" value="{{$data['id']}}" name = "answer[{{$data['id']}}][res]">
                            <input type="hidden" value="{{$get_exam[0]['id']}}" name = "mock_exam_id">

                            <div class="form-check">
                                <input class="form-check-input"  type="radio" value = "{{$data['option_1']}}" name="answer[{{$data['id']}}][opt]" id="flexRadioDefault{{$data['option_1']}}">
                                <label class="form-check-label" for="flexRadioDefault{{$data['option_1']}}">
                                {{$data['option_1']}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input"  type="radio" value = "{{$data['option_2']}}" name="answer[{{$data['id']}}][opt]" id="flexRadioDefault2{{$data['option_2']}}" >
                                <label class="form-check-label" for="flexRadioDefault{{$data['option_2']}}">
                                {{$data['option_2']}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input"  type="radio" value = "{{$data['option_3']}}" name="answer[{{$data['id']}}][opt]" id="flexRadioDefault3{{$data['option_3']}}" >
                                <label class="form-check-label" for="flexRadioDefault{{$data['option_3']}}">
                                {{$data['option_3']}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value = "{{$data['option_4']}}" name="answer[{{$data['id']}}][opt]" id="flexRadioDefault4{{$data['option_4']}}" >
                                <label class="form-check-label" for="flexRadioDefault{{$data['option_4']}}">
                                {{$data['option_4']}}
                                </label>
                            </div>

                        </div>
                        @empty
                        <p>No questions Found</p>
                        @endforelse
                        <button class = "btn btn-primary submit-btn mt-3 ml-3" type="submit">Submit</button>

                    </form>
            
               </div>
           </div>
       </div>
    </div>
</x-app-layout>
