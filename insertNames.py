import mysql.connector

# Database connection
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="StinkyBoy225$",  # ⚠️ DO NOT hardcode passwords in real applications!
    database="cp476"
)

cursor = db.cursor()

# Open file and insert data
with open("NameTable.txt", "r") as f:
    for line in f:
        arr = line.strip().split(", ")
        student_id, full_name = arr  # Extract values

        # Prepare SQL statement
        query = """
        INSERT INTO Name (student_id, full_name)
        VALUES (%s, %s);
        """
        values = (student_id, full_name)

        # Execute and commit
        cursor.execute(query, values)
        db.commit()

        print(f"Inserted: {values}")  # Debugging output
        print(arr)
# Close connection
cursor.close()
db.close()
