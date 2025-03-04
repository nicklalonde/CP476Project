import mysql.connector

# Database connection
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="StinkyBoy225$",  
    database="cp476"
)

cursor = db.cursor()

# Open file and insert data
with open("CourseTable.txt", "r") as f:
    for line in f:
        arr = line.strip().split(", ")
        student_id, course_code, test1, test2, test3, final = arr  # Extract values

        # Prepare SQL statement
        query = """
        INSERT INTO Course (student_id, course_code, test1, test2, test3, final_exam)
        VALUES (%s, %s, %s, %s, %s, %s);
        """
        values = (student_id, course_code, test1, test2, test3, final)

        # Execute and commit
        cursor.execute(query, values)
        db.commit()

        print(f"Inserted: {values}")  # Debugging output
        print(arr)
# Close connection
cursor.close()
db.close()