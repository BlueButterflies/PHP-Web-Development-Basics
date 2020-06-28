<?php
class Human{
    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /**
     * Human constructor.
     * @param string $firstName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    protected function setFirstName(string $firstName): void
    {
        if(!ctype_upper($firstName[0])){
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
        if (strlen($firstName) < 4 ){
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName): void
    {
        if(!ctype_upper($lastName[0])){
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 3 ){
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return "First Name: ".$this->getFirstName().PHP_EOL
              ."Last Name: ". $this->getLastName().PHP_EOL;
    }
}

class Student extends Human{

    /** @var string */
    private $facultyNumber;

    /**
     * Student constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $facultyNumber
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    /**
     * @return string
     */
    public function getFacultyNumber(): string
    {
        return $this->facultyNumber;
    }

    /**
     * @param string $facultyNumber
     * @throws Exception
     */
    private function setFacultyNumber(string $facultyNumber): void
    {
        if (!preg_match("/^[\d]{5,10}$/", $facultyNumber)){
            throw  new Exception("Invalid faculty number!");
        }
        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        return parent::__toString()
            ."Faculty number: ".$this->getFacultyNumber().PHP_EOL;
    }
}

class Worker extends Human {

    /**
     * @var float
     */
    private $weekSalary;

    /** @var int */
    private $hoursPerDay;

    /**
     * Worker constructor.
     * @param string $firstName
     * @param string $lastName
     * @param float $weekSalary
     * @param int $hoursPerDay
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName,float $weekSalary, int $hoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->weekSalary = $weekSalary;
        $this->hoursPerDay = $hoursPerDay;
        $this->SalaryPerHours();
    }

    /**
     * @return float
     */
    public function getWeekSalary(): float
    {
        return $this->weekSalary;
    }

    /**
     * @param float $weekSalary
     * @throws Exception
     */
    private function setWeekSalary(float $weekSalary): void
    {
        if ($weekSalary <= 10){
            throw  new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = $weekSalary;
    }

    /**
     * @return int
     */
    public function getHoursPerDay(): int
    {
        return $this->hoursPerDay;
    }

    /**
     * @param int $hoursPerDay
     * @throws Exception
     */
    private function setHoursPerDay(int $hoursPerDay): void
    {
        if ($hoursPerDay < 1 || $hoursPerDay > 12){
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->hoursPerDay = $hoursPerDay;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName): void
    {
        if (strlen($lastName) <= 3){
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }

        parent::setLastName($lastName);
    }

    private function SalaryPerHours():float {
        $result = $this->weekSalary / ($this->hoursPerDay * 7);

        return  $result;
    }

    public function __toString()
    {
        $salary = number_format($this->getWeekSalary(), 2, ".", "");
        $hours = number_format($this->getHoursPerDay(), 2, ".", "");
        $salaryPerDay = number_format($this->SalaryPerHours(), 2, ".", "");

        return parent::__toString()
            ."Week Salary: ". $salary
            .PHP_EOL
            ."Hours per day: ".$hours
            .PHP_EOL
            ."Salary per hour: ".$salaryPerDay
            .PHP_EOL;
    }
}

try {
    list($firstNameStudent, $secondName, $facultyNumber) =  explode(" ", readline());
    list($firstName, $lastName, $salary, $hours) = explode(" ", readline());

    $students = new Student($firstNameStudent, $secondName, $facultyNumber);
    $workers = new Worker($firstName, $lastName, $salary, $hours);

    echo $students
        .PHP_EOL.
        $workers;
}catch (Exception $exception){
    echo $exception->getMessage();
    return;
}