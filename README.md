#
# Busuu backend engineer test
#

Welcome to busuu's backend engineer coding test!

When a new user joins busuu, one of their first step is to complete an assessment of their current level of knowledge with the language they want to learn.
The purpose of this coding test is to implement the logic for this assessment. We will call this feature the Language Level Assessment.
The output of this assessment is a level: A1, A2, B1, B2, C1 or C2 (read about the meaning of the classification at https://en.wikipedia.org/wiki/Common_European_Framework_of_Reference_for_Languages).

Example: a user starts taking the Language Level Assessment. They answer a number of language questions, or exercises, and receive a grade of B1 at the end of the evaluation.

# The task

When you start this task, the unit tests present in this repository are failing.
You must implement the contents of class `./src/Service/LevelAssessmentService.php` so that the unit tests in this repository successfully pass.
The unit tests will check that for various Language Level Assessment results, the user is graded at the correct language level.

# The business rules

1) To complete the Language Level Assessment, the user must submit a certain number of exercises (think of them as individual questions about the language).
2) The exercises are evaluated in sets of 3.
3) Each successfully passed exercise in the set adds 1 point, each failed exercise adds 0 point.
4) When the set of 3 is completed, the level is updated based on those rules:
    - 0 points => go down one level
    - 1 point => stays at level
    - 2 points => go up one level
    - 3 points => go up two levels
5) The order of the level is from lowest to highest A1, A2, B1, B2, C1, C2. The evaluation starts at level A1.   
6) The Language Level Assessment ends when a maximum of 5 sets of 3 exercises have been evaluated. It can also finish early if the calculated level does not change for 2 consecutive sets of exercises.
7) As a consequence, the number of exercises necessary to complete the evaluation is variable.
8) If not enough exercises were submitted, the assessment cannot assign a level to the user.

# What you can do

Make any change to `./src/Service/LevelAssessmentService.php.php` as long as you do not break the interface for `calculateLevel`.
Change or create any file inside the `src` directory.
Add new tests.
Add new dependencies in `composer.json`.

# What we will grade   

1) The existing unit tests passing successfully.
2) The general architecture of your solution:
   - Separation of concerns
   - SOLID and design patterns implementation
   - Extendability
   - Abstraction
3) The clarity of the code.
4) The presence of additional tests.

# How to start

Before your start you need to have PHP7 and composer installed. That's all!
Start by installing composer dependencies, then run the unit tests (run `vendor/phpunit/phpunit/phpunit tests/`).


Thanks for taking the time to complete this test and don't hesitate to email us if you have any question.
