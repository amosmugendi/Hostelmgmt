CREATE TABLE rooms (
  id INT PRIMARY KEY AUTO_INCREMENT,
  room_type VARCHAR(255) NOT NULL,
  fee DECIMAL(10,2) NOT NULL,
  max_occupants INT NOT NULL
);

INSERT INTO rooms (room_type, fee, max_occupants) VALUES
  ('single', 5000, 1),
  ('shared', 6000, 2),
  ('single', 5000, 1),
  ('shared', 6000, 2),
  ('single', 5000, 1),
  ('shared', 6000, 2),
  ('single', 5000, 1),
  ('shared', 6000, 2),
  ('single', 5000, 1),
  ('shared', 6000, 2);
