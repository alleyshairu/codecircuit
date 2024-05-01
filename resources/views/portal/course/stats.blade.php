@extends('portal.course._layout')

@section('title')
    {{ $language->name }} Stats
@endsection

@section('course_content')
    <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
            <div class="w-full">
                <h3 class="text-base font-normal">Chapers</h3>
                <div class="my-3 text-2xl font-bold leading-none text-gray-900 sm:text-3xl ">{{ $chaptersCount }}</div>
                <div class="text-xs text-gray-500">Total numbers of chapters added for this course</div>
            </div>
        </div>

        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
            <div class="w-full">
                <h3 class="text-base font-normal">Students</h3>
                <div class="my-3 text-2xl font-bold leading-none text-gray-900 sm:text-3xl ">{{ $studentsEnrolled }}</div>
                <div class="text-xs text-gray-500">Total numbers of students following this course</div>
            </div>
        </div>

        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
            <div class="w-full">
                <h3 class="text-base font-normal">Problems</h3>
                <div class="my-3 text-2xl font-bold leading-none text-gray-900 sm:text-3xl ">{{ $problemsCount }}</div>
                <div class="text-xs text-gray-500">Total numbers of problems in this course</div>
            </div>
        </div>
    </div>
@endsection
