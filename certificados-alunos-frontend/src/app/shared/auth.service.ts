import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { map, tap } from 'rxjs/operators';

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

  login(credentials: { email: string, password: string }): Observable<User> {

    return this.httpClient.post<User>(environment.url_backend + '/login',
      {
        email: credentials.email,
        password: credentials.password,
      }, { withCredentials: true })
      .pipe(
        tap(
          user => this.user$.next(user),
        )
      )
  }

  info(): Observable<User> {

    return this.httpClient.get<User>(environment.url_backend + '/me',
      { withCredentials: true })
      .pipe(
        tap(
          user => this.user$.next(user),
        )
      )
  }

  logout(): Observable<any> {

    return this.httpClient.delete(environment.url_backend + '/login',
      { withCredentials: true })
      .pipe(
        tap(
          () => this.user$.next(null),
        )
      )
  }
}