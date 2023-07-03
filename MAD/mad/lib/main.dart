import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: MyHomePage(),
    );
  }
}

class MyHomePage extends StatefulWidget {
  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  int _currentIndex = 0;

  final List<Widget> _tabs = [
    Tab1(),
    Tab2(),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('SummaMove'),
      ),
      body: _tabs[_currentIndex],
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: _currentIndex,
        onTap: (int index) {
          setState(() {
            _currentIndex = index;
          });
        },
        items: [
          BottomNavigationBarItem(
            icon: Icon(Icons.directions_run),
            label: 'Exercises',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.scoreboard),
            label: 'Custom Exer.',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.person),
            label: 'Tab 3',
          ),
        ],
      ),
    );
  }
}

class Tab1 extends StatefulWidget {
  @override
  _Tab1State createState() => _Tab1State();
}

class Exercise {
  final int id;
  final String exerciseName;
  final String description;

  Exercise({
    required this.id,
    required this.exerciseName,
    required this.description,
  });
}

class _Tab1State extends State<Tab1> {
<<<<<<< HEAD
  List<dynamic> exercises = [];

  @override
  void initState() {
    super.initState();
    fetchExercises();
  }

  Future<void> fetchExercises() async {
    final response = await http.get(Uri.parse('http://127.0.0.1:8000/api/exercises/'));
    if (response.statusCode == 200) {
      setState(() {
        exercises = jsonDecode(response.body);
      });
    } else {
      // Handle error response
      print('Failed to fetch exercises');
=======
  Future<List<Exercise>> fetchExercises() async {
    final response =
    await http.get(Uri.parse('http://10.0.2.2:8000/api/exercises'));
    if (response.statusCode != 200) {
      throw Exception('Failed to fetch exercises');
>>>>>>> e142a690267303e4e7ee8895109ae03ad980fb71
    }

    final List<dynamic> data = jsonDecode(response.body);
    List<Exercise> exercises = [];
    for (int i = 0; i < data.length; i++) {
      final exercise = Exercise(
        id: data[i]['id'],
        exerciseName: data[i]['exercise_name'],
        description: data[i]['description'],
      );
      exercises.add(exercise);
    }
    return exercises;
  }

  @override
  Widget build(BuildContext context) {
    return FutureBuilder<List<Exercise>>(
      future: fetchExercises(),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          final List<Exercise> exercises = snapshot.data!;
          return ListView.builder(
            itemCount: exercises.length,
            itemBuilder: (BuildContext context, int index) {
              final Exercise exercise = exercises[index];
              return ListTile(
                title: Text(exercise.exerciseName),
                subtitle: Text(exercise.description),
              );
            },
          );
        } else if (snapshot.hasError) {
          return Center(child: Text('Error: ${snapshot.error}'));
        } else {
          return Center(child: CircularProgressIndicator());
        }
      },
    );
  }
}

class Tab2 extends StatefulWidget {
  @override
  _Tab2State createState() => _Tab2State();
}

class _Tab2State extends State<Tab2> {
  final _formKey = GlobalKey<FormState>();
  TextEditingController _exerciseNameController = TextEditingController();
  TextEditingController _descriptionController = TextEditingController();

  @override
  void dispose() {
    _exerciseNameController.dispose();
    _descriptionController.dispose();
    super.dispose();
  }

  Future<void> _submitForm() async {
    if (_formKey.currentState!.validate()) {
      String exerciseName = _exerciseNameController.text;
      String description = _descriptionController.text;

      // Create a JSON payload
      Map<String, dynamic> exerciseData = {
        'exercise_name': exerciseName,
        'description': description,
      };
      String jsonData = jsonEncode(exerciseData);

      // Send a POST request
      final response = await http.post(
        Uri.parse('http://10.0.2.2:8000/api/exercises'),
        headers: {'Content-Type': 'application/json'},
        body: jsonData,
      );

      print('Response status: ${response.statusCode}');
      print('Response body: ${response.body}');

      if (response.statusCode == 201) {
        // Clear the form fields
        _exerciseNameController.clear();
        _descriptionController.clear();

        // Show a success message or perform any additional actions
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text('Custom exercise added!')),
        );
      } else {
        // Show an error message or handle the error appropriately
        String errorMessage = 'Failed to add custom exercise. Please try again.';
        if (response.statusCode == 400) {
          errorMessage = 'Invalid exercise data. Please check your input.';
        } else if (response.statusCode == 500) {
          errorMessage = 'Server error. Please try again later.';
        }
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text(errorMessage)),
        );
      }
    }
  }

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.all(16.0),
      child: Form(
        key: _formKey,
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            TextFormField(
              controller: _exerciseNameController,
              decoration: InputDecoration(labelText: 'Exercise Name'),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return 'Please enter the exercise name.';
                }
                return null;
              },
            ),
            TextFormField(
              controller: _descriptionController,
              decoration: InputDecoration(labelText: 'Description'),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return 'Please enter the exercise description.';
                }
                return null;
              },
            ),
            SizedBox(height: 16.0),
            ElevatedButton(
              onPressed: _submitForm,
              child: Text('Add Exercise'),
            ),
          ],
        ),
      ),
    );
  }
}
