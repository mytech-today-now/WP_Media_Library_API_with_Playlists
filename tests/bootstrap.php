<?php

// Include the test bootstrap file
require_once 'tests/bootstrap.php';

/**
 * Class TestUtilsFunctions
 * Tests for utility functions in utils.php
 */
class TestUtilsFunctions extends WP_UnitTestCase {

    /**
     * Test sanitize_string_input function
     */
    public function test_sanitize_string_input() {
        // Positive test
        $this->assertEquals('Hello World', sanitize_string_input('<script>alert(1)</script>Hello World'));

        // Boundary test
        $this->assertEquals('', sanitize_string_input(''));

        // Negative test
        $this->assertNotEquals('<script>alert(1)</script>', sanitize_string_input('<script>alert(1)</script>'));
    }

    // Add more tests for other utility functions...

}

// Add more test classes for other PHP files or classes in the plugin...

?>