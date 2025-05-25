<x-layout>
    <div x-data="quizData()" class="max-w-xl mx-auto my-12">
        <div class="bg-[#1b1b1c] rounded-2xl shadow-2xl p-8 border border-gray-700">
            <template x-if="!currentQuestion">
                <button class="bg-[#23232a] hover:bg-[#23232a]/80 text-[#77C1D2] font-bold py-3 px-8 rounded-xl text-xl shadow-lg transition-all duration-150 mx-auto block border border-[#77C1D2]" x-on:click="startQuiz()">Start Quiz</button>
            </template>
            <template x-if="currentQuestion && !showResults">
                <div>
                    <h2 class="text-2xl font-bold mb-4 text-[#77C1D2] text-center" x-text="'Question ' + (currentQuestionIndex + 1) + ' of ' + questions.length"></h2>
                    <p class="mb-6 text-xl text-[#77C1D2] text-center font-semibold" x-text="currentQuestion.question"></p>
                    <div class="grid grid-cols-1 gap-4 mb-6">
                        <template x-for="(answer, index) in currentQuestion.answers">
                            <div class="rounded-xl border border-[#77C1D2] px-6 py-4 text-center cursor-pointer text-lg font-bold transition-all duration-100 shadow hover:scale-105"
                                 x-on:click="selectedAnswer = index"
                                 :class="{ 'bg-[#2a4e5c] text-[#77C1D2] ring-4 ring-[#77C1D2]': selectedAnswer === index, 'bg-[#23232a] text-[#77C1D2] hover:bg-[#23232a]/80': selectedAnswer !== index }">
                                <span x-text="answer"></span>
                            </div>
                        </template>
                    </div>
                    <button class="bg-[#23232a] hover:bg-[#23232a]/80 text-[#77C1D2] font-bold py-3 px-8 rounded-xl text-xl shadow-lg transition-all duration-150 mx-auto block border border-[#77C1D2]" x-on:click="confirmAnswer()">Confirm Answer</button>
                </div>
            </template>
            <template x-if="showResults">
                <div class="text-center">
                    <h2 class="text-2xl font-bold mb-4 text-[#77C1D2]">Quiz Results</h2>
                    <p class="mb-6 text-lg text-[#77C1D2]">You got <span class="font-bold text-[#77C1D2]" x-text="correctAnswers"></span> out of <span class="font-bold text-[#77C1D2]" x-text="questions.length"></span> questions correct! (<span class="font-bold text-[#77C1D2]" x-text="Math.round(correctAnswers / questions.length * 100)"></span>%)</p>
                    <button class="bg-[#23232a] hover:bg-[#23232a]/80 text-[#77C1D2] font-bold py-3 px-8 rounded-xl text-xl shadow-lg transition-all duration-150 mx-auto block border border-[#77C1D2]" x-on:click="restartQuiz()">Retry Quiz</button>
                </div>
            </template>
        </div>
    </div>
    <script>
        function quizData() {
            return {
                questions: [
                    {
                        question: "What is the capital of France?",
                        answers: ["Paris", "Berlin", "Madrid", "Rome"],
                        correctAnswer: "Paris",
                    },
                    {
                        question: "What is the largest ocean in the world?",
                        answers: ["Atlantic", "Indian", "Arctic", "Pacific"],
                        correctAnswer: "Pacific",
                    },
                    {
                        question: "What is the currency of Japan?",
                        answers: ["Dollar", "Euro", "Yen", "Pound"],
                        correctAnswer: "Yen",
                    },
                ],

                currentQuestionIndex: 0,
                currentQuestion: null,
                selectedAnswer: null,
                correctAnswers: 0,
                showResults: false,

                nextQuestion() {
                    if (this.currentQuestionIndex < this.questions.length - 1) {
                        this.currentQuestionIndex++;
                        this.currentQuestion = this.questions[this.currentQuestionIndex];
                        this.selectedAnswer = null;
                    } else {
                        this.showResults = true;
                    }
                },

                confirmAnswer() {
                    if (this.selectedAnswer === null) {
                        alert("Please select an answer!");
                        return;
                    }
                    if (this.currentQuestion.answers[this.selectedAnswer] === this.currentQuestion.correctAnswer) {
                        this.correctAnswers++;
                    }
                    this.nextQuestion();
                },

                startQuiz() {
                    this.currentQuestion = this.questions[0];
                },

                restartQuiz() {
                    this.currentQuestionIndex = 0;
                    this.currentQuestion = null;
                    this.selectedAnswer = null;
                    this.correctAnswers = 0;
                    this.showResults = false;
                },

                get percentageCorrect() {
                    return Math.round((this.correctAnswers / this.questions.length) * 100);
                },
            };
        }
    </script>

</x-layout>
