  import 'dart:convert';
  import 'package:flutter/material.dart';


  void main() {
    runApp(MyApp());
  }

  class MyApp extends StatefulWidget {
    @override
    _MyAppState createState() => _MyAppState();
  }

  class _MyAppState extends State<MyApp> {
    int _currentIndex = 0;

    final List<Widget> _tabs = [
      Tab1(),
      Tab2(),
      Tab3(),
    ];

    @override
    Widget build(BuildContext context) {
      return MaterialApp(
        home: Scaffold(
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
                label: 'Excercises',
              ),
              BottomNavigationBarItem(
                icon: Icon(Icons.scoreboard),
                label: 'Score',
              ),
              BottomNavigationBarItem(
                icon: Icon(Icons.person),
                label: 'Tab 3',
              ),
            ],
          ),
        ),
      );
    }
  }

  class Tab1 extends StatelessWidget {
    @override
    Widget build(BuildContext context) {
      return Center(
        child: Text('Excercises'),
      );
    }
  }

  class Tab2 extends StatelessWidget {
    @override
    Widget build(BuildContext context) {
      return Center(
        child: Text('Tab 2'),
      );
    }
  }

  class Tab3 extends StatelessWidget {
    @override
    Widget build(BuildContext context) {
      return Center(
        child: Text('Tab 3'),
      );
    }
  }