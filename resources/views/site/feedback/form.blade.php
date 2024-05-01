<button data-modal-target="feedback-modal" data-modal-toggle="feedback-modal" class="btn-primary" type="button">
    Feedback
</button>

<div id="feedback-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900">
                        Problem Feedback
                    </h3>
                    <div class="text-sm text-muted-foreground">Provide your valuable feedback on the problem material.</div>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="feedback-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form class="grid gap-5" method="post" action="{{ route('feedback.store') }}">
                    @csrf

                    <div class="flex">
                        <div class="flex items-center h-5">
                            <input id="feedback-knowledge" type="checkbox" name="knowledge"
                                class="w-4 h-4 text-blue-600 border-border rounded focus:ring-blue-500">
                        </div>
                        <div class="ms-2 text-sm">
                            <label for="feedback-knowledge" class="font-medium">Gained New Knowledge?</label>
                            <p class="text-sm font-normal text-muted-foreground">Did this problem help you in learning something new?</p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex items-center h-5">
                            <input id="feedback-instructions" type="checkbox" name="instructions"
                                class="w-4 h-4 text-blue-600 border-border rounded focus:ring-blue-500">
                        </div>
                        <div class="ms-2 text-sm">
                            <label for="feedback-instructions" class="font-medium">Clear Instructions?</label>
                            <p class="text-sm font-normal text-muted-foreground">Were the instructions of the problem clear enough?</p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex items-center h-5">
                            <input id="feedback-interesting" type="checkbox" name="interesting"
                                class="w-4 h-4 text-blue-600 border-border rounded focus:ring-blue-500">
                        </div>
                        <div class="ms-2 text-sm">
                            <label for="feedback-interesting" class="font-medium">Interesting?</label>
                            <p class="text-sm font-normal text-muted-foreground">Did you find the problem interesting?</p>
                        </div>
                    </div>

                    <div class="grid gap-3">
                        <x-input-label for="score" value="Score" />
                        <p class="text-sm font-normal text-muted-foreground">Higher the score the better the problem.</p>

                        <div class="flex flex-wrap">
                            <div class="flex items-center me-4">
                                <input id="one-radio" type="radio" value="1" name="score"
                                    class="w-4 h-4 text-red-600 border-border focus:ring-red-500 focus:ring-2">
                                <label for="one-radio" class="ms-2 text-sm font-medium">1</label>
                            </div>

                            <div class="flex items-center me-4">
                                <input id="two-radio" type="radio" value="2" name="score"
                                    class="w-4 h-4 text-yellow-400 border-border focus:ring-yellow-400 focus:ring-2">
                                <label for="two-radio" class="ms-2 text-sm font-medium">2</label>
                            </div>

                            <div class="flex items-center me-4">
                                <input id="three-radio" type="radio" value="3" name="score"
                                    class="w-4 h-4 text-yellow-400 border-border focus:ring-yellow-500 focus:ring-2">
                                <label for="three-radio" class="ms-2 text-sm font-medium">3</label>
                            </div>

                            <div class="flex items-center me-4">
                                <input id="four-radio" type="radio" value="4" name="score"
                                    class="w-4 h-4 text-yellow-400 border-border focus:ring-yellow-500 focus:ring-2">
                                <label for="four-radio" class="ms-2 text-sm font-medium">4</label>
                            </div>

                            <div class="flex items-center me-4">
                                <input id="five-radio" type="radio" value="5" name="score" checked
                                    class="w-4 h-4 text-green-400 border-border focus:ring-green-500 focus:ring-2">
                                <label for="five-radio" class="ms-2 text-sm font-medium">5</label>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-3">
                        <x-input-label for="feedback" value="Feedback" />
                        <textarea name="feedback" rows="5" cols="5">{{ old('feedback') }}</textarea>
                    </div>

                    <input type="hidden" name="problem_id" value="{{ $problem->id() }}" />

                    <div>
                        <button type="submit" class="btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
