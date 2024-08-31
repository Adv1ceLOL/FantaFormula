<?php

    if (file_exists(dirname(__DIR__) . '\incremento_ban.php')) {
        echo "Il file esiste";
    } else {
        echo "Il file non esiste";
    }

    require_once dirname(__DIR__) . '\incremento_ban.php';

    use PHPUnit\Framework\TestCase;

        class DatabaseConnection {
            private $mysqli;
        
            public function __construct($host, $user, $password, $database, $mysqli = null) {
                if ($mysqli === null) {
                    $this->mysqli = $this->createConnection($host, $user, $password, $database);
                } else {
                    $this->mysqli = $mysqli; // Utilizza il mock fornito
                }
            }
        
            protected function createConnection($host, $user, $password, $database) {
                return new mysqli($host, $user, $password, $database);
            }
        
            public function prepare($query) {
                return $this->mysqli->prepare($query);
            }
        }


        class UserTest extends PHPUnit\Framework\TestCase {
            private $conn;
        
            protected function setUp(): void {
                $this->mysqli = $this->createMock(mysqli::class);
                $dummyHost = 'localhost';
                $dummyUser = 'user';
                $dummyPassword = 'password';
                $dummyDatabase = 'test_db';
                $this->conn = new DatabaseConnection($dummyHost, $dummyUser, $dummyPassword, $dummyDatabase, $this->mysqli);
            }
            
            public function testToggleBan() {
                $username = 'testUser';
                $initialBanStatus = 1; // esempio stato ban iniziale
                $expectedNewBanStatus = 0; // come dovrebbe essere il ban dopo il toggle
            
                $stmt1 = $this->createMock(mysqli_stmt::class);
                $stmt2 = $this->createMock(mysqli_stmt::class);
                $resultMock = $this->createMock(mysqli_result::class);
            
                $this->mysqli->method('prepare')->willReturnOnConsecutiveCalls($stmt1, $stmt2);

                $stmt1->method('get_result')->willReturn($resultMock);
        
                $resultMock->method('fetch_assoc')->willReturn(['ban' => $initialBanStatus]);
    
                $stmt2->method('execute')->willReturn(true);

                $user = new User($this->mysqli);
            
                $result = $user->toggleBan($username, $this->conn);
            
                $this->assertIsArray($result);
                $this->assertTrue($result['success']);
                $this->assertEquals($expectedNewBanStatus, $result['newBanStatus']);

                fwrite(STDERR, "\nUsername: " . $username . "\n");
                fwrite(STDERR, "Initial Ban Status: " . $initialBanStatus . "\n");
                fwrite(STDERR, "Expected New Ban Status: " . $expectedNewBanStatus . "\n");
                fwrite(STDERR, "Actual New Ban Status: " . $result['newBanStatus'] . "\n");
            }
        }
