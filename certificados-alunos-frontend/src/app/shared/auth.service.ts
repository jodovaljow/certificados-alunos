import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { map } from 'rxjs/operators';

import { environment } from 'src/environments/environment';
import { User } from './types';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  user$ = new BehaviorSubject<User | null>(null)
  userIsHomologador$: Observable<boolean> = this.user$
    .pipe(
      map(user => !!user && user.is_homologador)
    )
  userIsAluno$: Observable<boolean> = this.user$
    .pipe(
      map(user => !!user && user.is_aluno)
    )

  constructor(
    private httpClient: HttpClient,
  ) { }


  login(credentials: { email: string, password: string }) {

    this.httpClient.post<User>(environment.url_backend + '/login',
      {
        email: credentials.email,
        password: credentials.password,
      }, { withCredentials: true })
      .subscribe(
        user => this.user$.next(user),
        erro => this.user$.next(null),
      )
  }
}